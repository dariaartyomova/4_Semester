from enum import Enum
from typing import Self

COLORING = "\033[{}m{}"
PLACING = "\033[{};{}H{}"


class Color(Enum):
    TRANSPARENT = 0
    BLACK = 30
    RED = 31
    GREEN = 32
    YELLOW = 33
    BLUE = 34
    MAGENTA = 35
    CYAN = 36
    WHITE = 37
    


class Printer:
    _font: dict[str, list[str]] = {}
    _char_width: int = 5
    _char_height: int = 5

    def __init__(self, color: Color, position: tuple[int, int], symbol: str) -> None:
        self.color = color
        self.symbol = symbol
        self.current_x, self.current_y = position

    @classmethod
    def load_font(cls, filename: str = "font.txt") -> None:
        try:
            with open(filename, "r") as file:
                cls._font.clear()
                cls._char_height = int(file.readline().strip())
                cls._char_width = int(file.readline().strip())
                cls._font[' '] = [' '*cls._char_width for _ in range(cls._char_height)]
                while True:
                    char = file.readline().replace('-', '').strip()
                    if char == '':
                        break
                    cls._font[char] = []
                    for _ in range(cls._char_height):
                        line = file.readline()[:cls._char_width]
                        if '-' in line:
                            raise ValueError(f"Font file is not valid, character height is not consistent."
                                             f" List of correct characters: {cls._font.keys()}")
                        cls._font[char].append(line)
        except Exception as e:
            print(f"Error loading font file: {e}")
            raise FileNotFoundError

    @classmethod
    def print_(cls, text: str, color: Color, position: tuple[int, int], symbol: str) -> None:
        if not cls._font:
            cls.load_font()
        
        x, y = position
        for char in text:
            if char not in cls._font:
                raise ValueError(f"Character {char} is not in the font file")
            
            for line_num, line in enumerate(cls._font[char]):
                rendered = line.replace("*", symbol)
                print(PLACING.format(y + line_num + 1, x + 1, COLORING.format(color.value, rendered)), end="")
            
            x += cls._char_width
        print()

    def __enter__(self) -> Self:
        print(COLORING.format(self.color.value, ''), end="") 
        return self

    def __exit__(self, *args) -> None:
        print(COLORING.format(Color.TRANSPARENT.value, ''), end="")

    def print(self, text: str) -> None:
        if not self._font:
            self.load_font()
        x, y = self.current_x, self.current_y
        for char in text:
            if char not in self._font:
                continue
            
            for line_num, line in enumerate(self._font[char]):
                rendered = line.replace("*", self.symbol)
                # print(f"\033[{y + line_num + 1};{x + 1}H{rendered}", end="")
                print(PLACING.format(y + line_num + 1, x + 1, rendered), end="")
            
            x += self._char_width
        self.current_x = x


if __name__ == "__main__":
    for _ in range(10):
        print()
    Printer.load_font(filename="font5.txt")
    Printer.print_("ABC", Color.BLUE, (5, 2), ",")
    Printer.load_font(filename="font7.txt")
    for _ in range(12):
        print()
    with Printer(Color.MAGENTA, (1, 5), "@") as printer:
        printer.print("EXAMS NOT COOL")
