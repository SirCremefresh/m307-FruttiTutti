import {Component, OnInit} from '@angular/core';
import {FruitService} from "../../services/fruit.service";
import {Fruit} from "../../classes/fruit";
import {ParchOrder} from "../../classes/parchOrder";
import {QuantityCategory} from "../../classes/quantityCategory";
import {PatchOrderService} from "../../services/patch-order.service";
import {QuantityCategoryService} from "../../services/quantity-category.service";
import {MatTableDataSource} from "@angular/material";
import {forEach} from "@angular/router/src/utils/collection";

@Component({
	selector: 'app-home',
	templateUrl: './home.component.html',
	styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
	public fruits: Fruit[];
	public parchOrdersNotDone: ParchOrder[];
	public quantityCategories: QuantityCategory[];

	public displayedColumns = ['isOnTime', 'forename', 'lastname', 'fruit'];
	public dataSource = new MatTableDataSource();


	constructor(private fruitService: FruitService,
	            private patchOrderService: PatchOrderService,
	            private quantityCategoryService: QuantityCategoryService) {
	}

	ngOnInit() {
		this.loadData();
	}

	getQuantityCategoryWithId(id): QuantityCategory {
		for (let quantityCategory of this.quantityCategories) {
			if (quantityCategory.quantityCategoryId === id) {
				return quantityCategory;
			}
		}
	}

	getFruitById(id): Fruit {
		for (let fruit of this.fruits) {
			if (fruit.fruitId === id) {
				return fruit;
			}
		}
	}

	async loadData() {
		this.fruits = await this.fruitService.getAll();
		this.quantityCategories = await this.quantityCategoryService.getAll();
		this.parchOrdersNotDone = await this.patchOrderService.getNotDone();

		this.dataSource = new MatTableDataSource<any>(this.parchOrdersNotDone.map(
			(parchOrderNotDone) => {
				let totalDays = this.getQuantityCategoryWithId(parchOrderNotDone.quantityCategory_fk).totalDays;
				let orderDate = new Date(parchOrderNotDone.orderDate);
				let endDate = new Date(orderDate);
				endDate.setDate(endDate.getDate() + (+totalDays));
				let isOnTime = endDate.valueOf() > new Date(Date.now()).valueOf();
				return {
					'isOnTime': isOnTime,
					'forename': parchOrderNotDone.forename,
					'lastname': parchOrderNotDone.lastname,
					'fruit': this.getFruitById(parchOrderNotDone.fruit_fk).name
				}
			}
		))
	}

}
