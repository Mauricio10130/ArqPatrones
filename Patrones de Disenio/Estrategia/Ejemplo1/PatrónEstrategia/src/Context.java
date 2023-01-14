/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author HP
 */
public class Context {
    private Figura figura;
    
    public void setEstrategia(Figura estrategia){
       this.figura = estrategia;
    }
    
    public float calcularArea()
    {
        return figura.calcularArea();
    }
    
}
