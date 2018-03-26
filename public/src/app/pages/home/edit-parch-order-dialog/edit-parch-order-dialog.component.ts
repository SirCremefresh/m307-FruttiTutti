import { Component, OnInit } from '@angular/core';
import {MatDialogRef} from "@angular/material";

@Component({
  selector: 'app-edit-parch-order-dialog',
  templateUrl: './edit-parch-order-dialog.component.html',
  styleUrls: ['./edit-parch-order-dialog.component.css']
})
export class EditParchOrderDialogComponent implements OnInit {

	constructor(public dialogRef: MatDialogRef<EditParchOrderDialogComponent>) { }

  ngOnInit() {
  }

}
