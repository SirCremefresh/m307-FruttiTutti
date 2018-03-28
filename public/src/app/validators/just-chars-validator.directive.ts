import {Directive} from '@angular/core';
import {AbstractControl, NG_VALIDATORS, Validator} from "@angular/forms";

@Directive({
	selector: '[appJustCharsValidator]',
	providers: [{provide: NG_VALIDATORS, useExisting: JustCharsValidatorDirective, multi: true}]
})
export class JustCharsValidatorDirective implements Validator {

	validate(control: AbstractControl): { [key: string]: any } {
		let val = (control.value) ? control.value.trim() : "";
		return (/^[a-zA-Z]*$/.test(val)) ? null : {'justCharsValidator': {value: val}};
	}


}
