import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {environment} from "../../environments/environment";
import {QuantityCategory} from "../classes/quantityCategory";

@Injectable()
export class QuantityCategoryService {

	constructor(private httpClient: HttpClient) {
	}

	public async getAll() {
		return await this.httpClient.get<QuantityCategory>(environment.apiUrl + 'quantitycategory').toPromise();
	}

}
