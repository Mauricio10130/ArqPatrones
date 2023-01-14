/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pattern_bridge2;

/**
 *
 * @author JOSE MERIDA ROCA
 */
public class EnvioExpress extends EmpresaMensajera {

    public EnvioExpress(IEnvio envio) {
        super(envio);
    }

    public EnvioExpress(Paquete paquete) {
        super(paquete);
    }

    public EnvioExpress() {
    }

   
    
    
     
    @Override
    public float precioEmpresa(float valor) {
        return valor+envio.precio();
    }
    
    
}
