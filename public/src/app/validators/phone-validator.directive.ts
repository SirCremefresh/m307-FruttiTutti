import {Directive} from '@angular/core';
import {AbstractControl, NG_VALIDATORS, Validator} from "@angular/forms";

@Directive({
	selector: '[appPhoneValidator]',
	providers: [{provide: NG_VALIDATORS, useExisting: PhoneValidatorDirective, multi: true}]
})
export class PhoneValidatorDirective implements Validator {

	validate(control: AbstractControl): { [key: string]: any } {
		let val = (control.value) ? control.value.trim() : "";
		return (val === "" || /^[+]?[0-9 ]{7,30}$/.test(val)) ? null : {'phoneValidator': {value: control.value}};
	}


}
