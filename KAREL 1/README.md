# Karel Game

Karel je jednoduchá hra, kde robot "Karel" může vykonávat příkazy na 2D herním poli. Pomocí příkazů se Karel pohybuje, otáčí a umisťuje objekty na herní pole.

## Funkce

- **KROK [n]** - Posune Karla o `n` kroků vpřed. Pokud `n` není uvedeno, Karel se posune o 1 krok.
- **VLEVOBOK [n]** - Otočí Karla doleva o `n` krát. Pokud `n` není uvedeno, Karel se otočí 1krát.
- **POLOZ [X]** - Položí objekt na pozici Karla. Místo `X` může být libovolný text.
- **RESET** - Resetuje hru a vrátí Karla na výchozí pozici (levý horní roh).

## Použití

1. Otevřete soubor `index.html` ve vašem prohlížeči.
2. Zadejte příkazy do textového pole (jeden příkaz na řádku).
3. Klikněte na **Execute** pro vykonání příkazů.
4. Klikněte na **Reset** pro restartování hry.

## Struktura projektu

- **index.html**: Hlavní HTML soubor, obsahuje strukturu stránky.
- **style.css**: Styly pro vzhled hry, velikost buněk, vzhled Karla a další.
- **script.js**: JavaScript soubor pro logiku pohybu Karla, otáčení, umisťování objektů a zpracování příkazů.

