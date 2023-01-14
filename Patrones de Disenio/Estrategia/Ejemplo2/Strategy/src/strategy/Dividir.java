
package strategy;

/**
 *
 * @author Moises_pc    la class / esta heredando de IAritmetica el metodo realizar ope
 */
public class Dividir implements IAritmetica{
    public Dividir(){
        
    }
    
    @Override
    public int Operacion(int a, int b){
        return a/b;
    }
}
