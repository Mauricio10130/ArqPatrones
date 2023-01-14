
package strategy;

/**
 *
 * @author Moises_pc    la class x esta heredando de IAritmetica el metodo realizar ope
 */
public class Multiplicar implements IAritmetica {
    public Multiplicar() {
    }
    
    @Override
     public int Operacion(int a, int b)
    {
        return a * b;
    }
}
