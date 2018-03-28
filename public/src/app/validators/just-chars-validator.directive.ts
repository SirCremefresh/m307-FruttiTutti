import {Directive} from '@angular/core';
import {AbstractControl, NG_VALIDATORS, Validator} from "@angular/forms";

@Directive({
	selector: '[appJustCharsValidator]',
	providers: [{provide: NG_VALIDATORS, useExisting: JustCharsValidatorDirective, multi: true}]
})
export class JustCharsValidatorDirective implements Validator {

	validate(control: AbstractControl): { [key: string]: any } {
		return (/^[a-zA-Z]*$/.test(control.value)) ? null : {'justCharsValidator': {value: control.value}};
	}


}
