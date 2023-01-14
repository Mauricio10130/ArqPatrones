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
public abstract class EmpresaMensajera {
   protected IEnvio envio;
   protected Paquete paquete;

    public EmpresaMensajera(IEnvio envio) {
        this.envio = envio;
    }

     public EmpresaMensajera(Paquete paquete) {
        this.paquete = paquete;
    }
    
     public EmpresaMensajera() {
       
    }
    
    public String recogerPaquete(){
        System.out.println("Se ha recogido el paquete!");
       // envio.procesarEnvio();
        return "Se ha recogido el paquete."+"\n"+""+envio.procesarEnvio();
    }
    
    public String enviarPaquete(){
        return envio.enviar();
    }
    
    public String entregarPaquete(){
       // envio.procesarEntrega();
        System.out.println("Se ha entregado el paquete!");
        return "Se ha entregado el paquete!."+"\n"+envio.procesarEntrega();

    }
    public abstract float precioEmpresa(float valor);

    
    public IEnvio getEnvio() {
        return envio;
    }

    public void setEnvio(IEnvio envio) {
        this.envio = envio;
    }

    public Paquete getPaquete() {
        return paquete;
    }

    public void setPaquete(Paquete paquete) {
        this.paquete = paquete;
    }
    
    
    
    
    
}
