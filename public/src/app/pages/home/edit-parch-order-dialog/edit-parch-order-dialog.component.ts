import {Component, Inject, OnInit} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material";
import {ParchOrder} from "../../../classes/parchOrder";
import {Fruit} from "../../../classes/fruit";
import {FruitService} from "../../../services/fruit.service";
import {QuantityCategoryService} from "../../../services/quantity-category.service";
import {PatchOrderService} from "../../../services/patch-order.service";
import {QuantityCategory} from "../../../classes/quantityCategory";

@Component({
	selector: 'app-edit-parch-order-dialog',
	templateUrl: './edit-parch-order-dialog.component.html',
	styleUrls: ['./edit-parch-order-dialog.component.css']
})
export class EditParchOrderDialogComponent implements OnInit {
	public parchOrder: ParchOrder = new ParchOrder();
	public fruits: Fruit[];
	public quantityCategories: QuantityCategory[];
	public isCreate: boolean = true;

	constructor(public dialogRef: MatDialogRef<EditParchOrderDialogComponent>,
	            @Inject(MAT_DIALOG_DATA) public data: any,
	            private fruitService: FruitService,
	            private patchOrderService: PatchOrderService,
	            private quantityCategoryService: QuantityCategoryService) {
		this.isCreate = data.isCreate;
	}

	async ngOnInit() {
		this.fruits = await this.fruitService.getAll();
		this.quantityCategories = await this.quantityCategoryService.getAll();
	}

	onSubmit() {
		console.log(this.parchOrder);
	}

}
