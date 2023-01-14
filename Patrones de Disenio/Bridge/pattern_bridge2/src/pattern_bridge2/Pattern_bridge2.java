/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pattern_bridge2;

import java.lang.Thread;

/**
 *
 * @author JOSE MERIDA ROCA
 */
public class Pattern_bridge2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args){
        // TODO code application logic here
        EmpresaMensajera DHL = new DhlExpress();

        DHL.setEnvio(new EnvioMar());
        DHL.precioEmpresa((float)5.5);
        DHL.recogerPaquete();
        DHL.enviarPaquete();
        DHL.entregarPaquete();

    }

}
