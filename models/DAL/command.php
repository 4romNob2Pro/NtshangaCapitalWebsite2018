<?php
    class Command{
		//ACCOUNT
			var $SqlInsertAccount = "INSERT INTO account(isConfirmed, isLocked, accountTypeId, lastUpdate, Username, Password) 
			VALUES(:isConfirmed, :isLocked, :accountTypeId, :lastUpdate, :Username, :Password)";
			var $CheckIfAccExists = "SELECT 1 from account WHERE Username = ? LIMIT 1";
			var $CheckIfPassMatch = "SELECT 1 from account WHERE Username = ? and Password = ? LIMIT 1";
		
		//CUSTOMER
			var $SqlInsertCustomer = "INSERT INTO customer(FirstName, LastName, ContactNumber, AddressId, LastUpdate, accountId, Email) 
			VALUES(:FirstName, :LastName, :ContactNumber, :AddressId, :LastUpdate, :AccountId, :Email)";
		
        //EMPLOYEE
			var $SqlInsertEmployee = "INSERT INTO employee(employeeId, firstname, lastname, emplNo, email, Cellphone, accountId, addressId, lastUpdated) 
			VALUES(:employeeId, :firstname, :lastname, :emplNo, :email, :Cellphone, :accountId, :addressId, :lastUpdated)";
			var $SqlUpdateEmployee = "UPDATE employee 
			set firstname = :firstname, lastname = :lastname, emplNo = :emplNo, email = :email, Cellphone = :Cellphone, addressId = :addressId, lastUpdated = :lastUpdated)  
			WHERE employeeId = :employeeId";
			var $SqlDeleteEmployee = "DELETE FROM employee WHERE employeeId = :employeeId";
			var $SqlSelectEmployee = "SELECT employeeId, firstname, lastname, emplNo, email, Cellphone, accountId, addressId, lastUpdated 
			FROM employee WHERE employeeId = :employeeId";
			var $SqlSelectEmployees = "SELECT employeeId, firstname, lastname, emplNo, email, Cellphone, accountId, addressId, lastUpdated FROM employee";
		
		//CITY
			var $SqlSelectCity = "SELECT cityId, city, provinceId FROM city WHERE cityId = :cityId";
			var $SqlSelectCities = "SELECT cityId, city, provinceId FROM city";
			var $SqlInsertCity = "INSERT INTO city(cityId, city, provinceId) VALUES(:cityId, :city, :provinceId)";
		
		//PROVINCE
			var $SqlSelectProvince = "SELECT provinceId, province, countryId FROM province WHERE provinceId = :provinceId";
			var $SqlSelectProvincies = "SELECT provinceId, province, countryId FROM province";
			var $SqlInsertProvince = "INSERT INTO province(provinceId, province, countryId) VALUES(:provinceId, :province, :countryId)";
		
        //ARTICLE
			var $SqlInsertArticle = "INSERT INTO article(person_id, title, intro, descr) VALUES(:person_id, :title, :intro, :descr)";
			var $SqlSelectArticleById = "SELECT * FROM article WHERE id = :id";
			var $SqlSelectArticles = "SELECT * FROM article";
		
		//ADDRESS
			var $SqlInsertAddress = "INSERT INTO address(addressId, address, postalCode, cityId) VALUES(:addressId, :address, :postalCode, :cityId)";
			var $SqlSelectAddress = "SELECT addressId, address, postalCode, cityId FROM address WHERE addressId = :addressId";
			var $SqlUpdateAddress = "UPDATE address set address = :address, postalCode = :postalCode, cityId = :cityId WHERE addressId = :addressId";
		
        public function __constructor(){
            
        }
    }
?>