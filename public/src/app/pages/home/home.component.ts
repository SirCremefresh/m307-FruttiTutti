import {Component, OnInit} from '@angular/core';
import {FruitService} from "../../services/fruit.service";

@Component({
	selector: 'app-home',
	templateUrl: './home.component.html',
	styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

	constructor(private fruitService: FruitService) {
	}

	ngOnInit() {
		this.fruitService.getAll();
	}

}
