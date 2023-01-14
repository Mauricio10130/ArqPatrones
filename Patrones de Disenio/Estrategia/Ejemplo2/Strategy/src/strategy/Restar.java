
package strategy;

/**
 *
 * @author Moises_pc    la class - esta heredando de IAritmetica el metodo realizar ope
 */
public class Restar implements IAritmetica {
    public Restar() {
    }
    
    @Override
     public int Operacion(int a, int b)
    {
        return a - b;
    }
}
