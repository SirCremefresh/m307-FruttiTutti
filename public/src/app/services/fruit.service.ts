import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Fruit} from "../classes/fruit";
import { environment } from '../../environments/environment';

@Injectable()
export class FruitService {

	constructor(private httpClient: HttpClient) {
	}

	public async getAll() {
		return await this.httpClient.get<Fruit>(environment.apiUrl + 'fruit').toPromise();
	}

}
