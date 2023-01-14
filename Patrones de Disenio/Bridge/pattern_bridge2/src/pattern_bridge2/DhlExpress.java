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
public class DhlExpress extends EmpresaMensajera {

    public DhlExpress(IEnvio envio) {
        super(envio);
    }

    public DhlExpress() {
    }

    public DhlExpress(Paquete paquete) {
        super(paquete);
    }
float valor=(float)5.5;
    
    @Override
    public float precioEmpresa(float valor) {
        return this.valor+envio.precio();
    }
    
    

}
