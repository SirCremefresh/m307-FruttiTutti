import {Directive} from '@angular/core';
import {AbstractControl, NG_VALIDATORS, Validator} from "@angular/forms";

@Directive({
	selector: '[appEmailValidator]',
	providers: [{provide: NG_VALIDATORS, useExisting: EmailValidatorDirective, multi: true}]
})
export class EmailValidatorDirective implements Validator {

	validate(control: AbstractControl): { [key: string]: any } {
		let val = (control.value) ? control.value.trim() : "";
		return (/^\w+[@]\w+[.]\w{2,}$/.test(val)) ? null : {'emailValidator': {value: control.value}};
	}


}
