import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';


import {AppComponent} from './app.component';
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";
import {HomeComponent} from './pages/home/home.component';
import {LayoutComponent} from './layout/layout.component';
import {
	MatButtonModule, MatCardModule, MatCheckboxModule, MatDialogModule, MatDividerModule, MatFormFieldModule,
	MatIconModule,
	MatInputModule,
	MatSelectModule,
	MatTableModule,
	MatToolbarModule
} from "@angular/material";
import {FruitService} from "./services/fruit.service";
import {HttpClientModule} from "@angular/common/http";
import {PatchOrderService} from "./services/patch-order.service";
import {QuantityCategoryService} from "./services/quantity-category.service";
import {EditParchOrderDialogComponent} from './pages/home/edit-parch-order-dialog/edit-parch-order-dialog.component';
import {FormsModule} from "@angular/forms";
import {AppRoutingModule} from "./app-routing.module";
import {JustCharsValidatorDirective} from './validators/just-chars-validator.directive';
import {EmailValidatorDirective} from './validators/email-validator.directive';
import { PhoneValidatorDirective } from './validators/phone-validator.directive';


@NgModule({
	declarations: [
		AppComponent,
		HomeComponent,
		LayoutComponent,
		EditParchOrderDialogComponent,
		JustCharsValidatorDirective,
		EmailValidatorDirective,
		PhoneValidatorDirective
	],
	imports: [
		AppRoutingModule,
		BrowserAnimationsModule,
		BrowserModule,
		FormsModule,
		HttpClientModule,
		MatToolbarModule,
		MatCardModule,
		MatDividerModule,
		MatTableModule,
		MatDialogModule,
		MatButtonModule,
		MatInputModule,
		MatFormFieldModule,
		MatSelectModule,
		MatCheckboxModule,
		MatIconModule
	],
	providers: [
		FruitService,
		PatchOrderService,
		QuantityCategoryService
	],
	bootstrap: [
		AppComponent
	],
	entryComponents: [
		EditParchOrderDialogComponent
	]
})
export class AppModule {
}
