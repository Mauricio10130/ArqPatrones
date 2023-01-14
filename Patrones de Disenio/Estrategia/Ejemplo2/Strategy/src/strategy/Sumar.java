
package strategy;

/**
 *
 * @author Moises_pc    la class + esta heredando de IAritmetica el metodo realizar ope
 */
public class Sumar implements IAritmetica {
    public Sumar() {
    }
    
    @Override
     public int Operacion(int a, int b)
    {
        return a + b;
    }
}
