function validateShopForm() {

    if (document.addproduct.pro_name.value.length == 0) {
        alert("please enter the product name");
    }
    else if (document.addproduct.pro_name.value.length > 25) {
        alert("use a name with less than 25 characters");
    }
    else if (document.addproduct.pro_price.value == 0) {
        alert("please enter the price");
    }
    else if (document.addproduct.pro_tag.value.length > 50) {
        alert("please enter a product tag which has less than 50 characters");
    }
    else if (document.addproduct.category.selectedIndex == 0) {
        alert("please select the category Id");
    }
    else if (!(document.addproduct.var[0].checked || document.addproduct.var[1].checked)) {
        alert("please select a button for variations");
    }
    else if (document.addproduct.description.value.length == 0) {
        alert("please enter a product description");
    }
    else if (document.addproduct.sel_unit.value == 0) {
        alert("please enter selling unit");
    }
    else if (document.addproduct.stock.value == 0) {
        alert("please enter stock");
    }
}

function funcValidateShopReg() {
    if (document.regShop.sname.value.length == 0) {
        alert("please enter a shop name");
        return false;
    }
    else if (document.regShop.sname.value.length > 30) {
        alert("please enter a shop name with less than 30 characters");
        return false;
    }
    else if (document.regShop.descr.value.length == 0) {
        alert("please enter a shop description");
        return false;
    }
    else if (document.regShop.city.selectedIndex == 0) {

        alert("please select a location");
        return false;
    }
    else if (document.regShop.category.selectedIndex == 0) {

        alert("please select a category");
        return false;
    }
    else if (document.regShop.payment.value.length == 0) {
        alert("please enter a payment method");
        return false;
    }
}

function  validateRegister() {
    if (document.registrn.firstname.value.length == 0) {
        alert("please enter the first name");
        return false;
    }
    else if (document.registrn.firstname.value.length > 20) {
        alert("please enter a name with less than 20 characters");
        return false;
    }
    else if (document.registrn.lastname.value.length == 0) {
        alert("please enter the first name");
        return false;
    }
    else if (document.registrn.lastname.value.length > 30) {
        alert("please enter a name with less than 30 characters");
        return false;
    }
    else if (document.registrn.email.value.length == 0) {
        alert("please enter the email address");
        return false;
    }
    else if (document.registrn.reenteremail.value.length > 30) {
        alert("please enter a name with less than 30 characters");
        return false;
    }
    else if (document.registrn.password.value.length == 0) {
        alert("please enter the first name");
        return false;
    }
    else if (document.registrn.repassword.value.length > 32) {
        alert("please enter a name with less than 32 characters");
        return false;
    }
    else if (document.registrn.month.selectedIndex == 0) {
        alert("please select a month");
        return false;
    }
    else if (document.registrn.day.selectedIndex == 0) {
        alert("please select a day ");
        return false;
    }
    else if (document.registrn.year.selectedIndex == 0) {
        alert("please select a year");
        return false;
    }
    else if (!(document.registrn.gender[0].checked || document.registrn.gender[1].checked)) {
        alert("what is your gender ");
        return false;
    }
    else if (document.registrn.add1.value.length == 0) {
        alert("please enter the address");
        return false;
    }
    else if (document.registrn.add2.value.length == 0) {
        alert("please enter the address ");
        return false;
    }
    else if (document.registrn.postal.value.length == 0) {
        alert("please enter the postal code ");
        return false;
    }
    else if (!document.registrn.agree.checked) {
        alert("first user must agree the terms and conditions");
        return false;
    }
    else
        return true;
}



//etc