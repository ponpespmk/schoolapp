import { isValidNumber, parsePhoneNumberFromString } from 'libphonenumber-js';

function checkOperator() {
    // Ambil nilai dari input no_hp
    var noHp = $('#no_hp').val();

    // Parse nomor telepon
    const phoneNumber = parsePhoneNumberFromString(noHp, 'ID');

    // Lakukan pengecekan operator berdasarkan library
    if (phoneNumber && isValidNumber(phoneNumber)) {
        const countryCode = phoneNumber.countryCallingCode;
        const nationalNumber = phoneNumber.nationalNumber;

        if (countryCode === 62 && nationalNumber.toString().startsWith('8')) {
            const operatorDigit = nationalNumber.toString()[1];

            if (operatorDigit >= 1 && operatorDigit <= 9) {
                document.getElementById('operator').innerText = 'Telkomsel';
            } else if (operatorDigit >= 2 && operatorDigit <= 3) {
                document.getElementById('operator').innerText = 'Indosat';
            } else if (operatorDigit >= 5 && operatorDigit <= 9) {
                document.getElementById('operator').innerText = 'XL Axiata';
            } else {
                document.getElementById('operator').innerText = 'Operator tidak diketahui';
            }
        } else {
            document.getElementById('operator').innerText = 'Nomor telepon tidak valid';
        }
    } else {
        document.getElementById('operator').innerText = 'Nomor telepon tidak valid';
    }
}
