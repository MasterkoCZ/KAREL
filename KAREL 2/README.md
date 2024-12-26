# Karel Game (PHP Version)

## Popis
Tato aplikace je jednoduchá hra, ve které ovládáte robota jménem Karel. Pomocí příkazů můžete pohybovat Karlem po herním poli, otáčet ho a umisťovat objekty na jeho pozici.

## Funkce
- **KROK [n]**: Karel se pohne o `n` kroků. Pokud není číslo zadáno, pohne se o 1 krok.
- **VLEVOBOK [n]**: Karel se otočí vlevo o 90° `n` krát.
- **POLOZ [objekt]**: Umístí objekt (např. písmeno) na pozici Karla.
- **RESET**: Resetuje hru a vrátí Karla do výchozí pozice.

## Instalace
1. Stáhněte soubory a umístěte je na svůj PHP server (např. XAMPP).
2. Otevřete prohlížeč a přejděte na `http://localhost/index.php`.

## Použití
1. Zadejte příkazy pro Karla do textového pole.
2. Klikněte na **Execute** pro vykonání příkazů.
3. Klikněte na **Reset** pro resetování hry.

## Struktura souborů
- `index.php` – Hlavní soubor aplikace, kde je zobrazeno herní pole.
- `process.php` – Zpracovává příkazy, aktualizuje herní pole a vrací výsledky.
- `style.css` – Stylování herního pole.
