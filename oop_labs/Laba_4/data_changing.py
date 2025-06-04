from typing import Any
from protocols import PropertyChangingListenerProtocol, DataChangingProtocol

class NameValidator(PropertyChangingListenerProtocol):
    def on_property_changing(self, obj: DataChangingProtocol, property_name: str, old_value: Any, new_value: Any) -> bool:
        if property_name != 'name':
            return True
        if not isinstance(new_value, str):
            print( "Error: Name must be a string!")
            return False
        if not new_value.isalpha():
            print("Error: Name must contain only letters!")
            return False
        if len(new_value) < 2:
            print("Error: Name too short!")
            return False
        print(f"Name of {str(obj)} is changing from {old_value} to {new_value}")
        return True
    

class EmailValidator(PropertyChangingListenerProtocol):
    def on_property_changing(self, obj: DataChangingProtocol, property_name: str, old_value: Any, new_value: Any) -> bool:
        if property_name != 'email':
            return True
        if not isinstance(new_value, str):
            print("Error: Email must be a string!")
            return False
        if not ("@mail.ru" in new_value):
            print("Error: Email must be mail.ru. Email is not correct.")
            return False
        print(f"Email of {str(obj)} is changing from {old_value} to {new_value}")
        return True
