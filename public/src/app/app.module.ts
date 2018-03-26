import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';


import {AppComponent} from './app.component';
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";
import { HomeComponent } from './pages/home/home.component';
import { AppRoutingModule } from './/app-routing.module';
import { LayoutComponent } from './layout/layout.component';
import {MatCardModule, MatDividerModule, MatTableModule, MatToolbarModule} from "@angular/material";
import {FruitService} from "./services/fruit.service";
import {HttpClientModule} from "@angular/common/http";
import {PatchOrderService} from "./services/patch-order.service";
import {QuantityCategoryService} from "./services/quantity-category.service";


@NgModule({
	declarations: [
		AppComponent,
		HomeComponent,
		LayoutComponent
	],
	imports: [
		BrowserAnimationsModule,
		BrowserModule,
		AppRoutingModule,
		HttpClientModule,
		MatToolbarModule,
		MatCardModule,
		MatDividerModule,
		MatTableModule
	],
	providers: [
		FruitService,
		PatchOrderService,
		QuantityCategoryService
	],
	bootstrap: [AppComponent]
})
export class AppModule {
}
