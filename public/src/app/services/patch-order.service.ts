import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {environment} from "../../environments/environment";
import {ParchOrder} from "../classes/parchOrder";

@Injectable()
export class PatchOrderService {

	constructor(private httpClient: HttpClient) {
	}

	public async getNotDone(): Promise<ParchOrder[]> {
		return await this.httpClient.get<ParchOrder[]>(environment.apiUrl + 'parchorder/notdone').toPromise();
	}

}
