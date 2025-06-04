from data_changed import ConsoleLogger
from data_changing import NameValidator, EmailValidator
from user import User



if __name__ == "__main__":
    user = User("Biba", "biba@mail.ru")
    logger = ConsoleLogger()
    user.add_property_changed_listener(logger)
    
    name_validator = NameValidator()
    email_validator = EmailValidator()
    user.add_property_changing_listener(name_validator)
    user.add_property_changing_listener(email_validator)
    
    print("--- Valid changes ---")
    user.name = "Boba"   
    user.email = "boba@mail.ru"         
    
    print()
    print("--- Invalid changes ---")
    user.name = -5         
    user.name = "123"    
    user.email = 150        
    user.email = "biba@google.com"      
    
    print()
    print("--- Final values ---")
    print(f"Name: {user.name}, Email: {user.email}")