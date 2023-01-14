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
public class MundoExpress extends EmpresaMensajera{

    public MundoExpress(IEnvio envio) {
        super(envio);
    }

    public MundoExpress(Paquete paquete) {
        super(paquete);
    }

    public MundoExpress() {
    }

 

    

     
    @Override
    public float precioEmpresa(float valor) {
        return valor+envio.precio();
    }
    
}
