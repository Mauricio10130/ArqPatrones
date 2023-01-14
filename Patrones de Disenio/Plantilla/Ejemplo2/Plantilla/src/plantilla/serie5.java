/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package plantilla;

/**
 *
 * @author w6996
 */
public class serie5 extends Series{
    public serie5(int cant){
        super.setCantidad(cant);
    }

    @Override
    protected int calcular_termino(int i) {
        return i+2;
    }
}
