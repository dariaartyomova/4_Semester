from protocols import PropertyChangedListenerProtocol, DataChangedProtocol

class ConsoleLogger(PropertyChangedListenerProtocol):
    def on_property_changed(self, obj: DataChangedProtocol, property_name: str) -> None:
        print( f"[LOG] Property {property_name} changed in {str(obj)}")
