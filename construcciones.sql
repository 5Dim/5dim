update investigaciones set nivel=20;
UPDATE construcciones SET nivel = 30;
UPDATE construcciones SET nivel = 12 WHERE codigo LIKE 'ind%';
UPDATE industrias SET liquido = 1, micros = 1, fuel = 1, ma = 1, municion = 1;