import { Directive } from '@angular/core';
import {AbstractControl, NG_VALIDATORS, Validator} from "@angular/forms";

@Directive({
  selector: '[appEmailValidator]',
	providers: [{provide: NG_VALIDATORS, useExisting: EmailValidatorDirective, multi: true}]
})
export class EmailValidatorDirective implements Validator {

	validate(control: AbstractControl): { [key: string]: any } {
		return (/^\w+[@]\w+[.]\w{2,}$/.test(control.value)) ? null : {'emailValidator': {value: control.value}};
	}


}
