import {Component, Inject, OnInit, ViewChild} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material";
import {ParchOrder} from "../../../classes/parchOrder";
import {Fruit} from "../../../classes/fruit";
import {FruitService} from "../../../services/fruit.service";
import {QuantityCategoryService} from "../../../services/quantity-category.service";
import {PatchOrderService} from "../../../services/patch-order.service";
import {QuantityCategory} from "../../../classes/quantityCategory";
import {NgForm} from "@angular/forms";

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


	@ViewChild('parchForm') public parchForm: NgForm;


	constructor(public dialogRef: MatDialogRef<EditParchOrderDialogComponent>,
	            @Inject(MAT_DIALOG_DATA) public data: any,
	            private fruitService: FruitService,
	            private patchOrderService: PatchOrderService,
	            private quantityCategoryService: QuantityCategoryService) {
		this.isCreate = data.isCreate;
		if (!this.isCreate) {
			console.log(data);
			this.parchOrder = data.parchOrder;
		}
	}

	async ngOnInit() {
		this.fruits = await this.fruitService.getAll();
		this.quantityCategories = await this.quantityCategoryService.getAll();
	}

	async onSubmit() {
		for(let control in this.parchForm.form.controls) {
			this.parchForm.form.controls[control].markAsTouched();
		}
		this.parchForm.form.markAsDirty();
		if (this.parchForm.valid) {
			if (this.isCreate) {
				await this.patchOrderService.create(this.parchOrder);
			} else {
				await this.patchOrderService.edit(this.parchOrder, this.parchOrder.parchOrderId);
			}
			this.dialogRef.close();
		}
	}


}
