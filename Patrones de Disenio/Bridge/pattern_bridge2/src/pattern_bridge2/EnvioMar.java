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
public class EnvioMar implements IEnvio{

    @Override
    public String procesarEnvio() {
        System.out.println("El paquete se ha cargado en el barco. . .");
        return "El paquete se ha cargado en el barco. . .";
    }

    @Override
    public String enviar() {
        System.out.println("El paquete esta siendo enviado por mar. . .");
        return "El paquete esta siendo enviado por mar. . .";
    }

    @Override
    public String procesarEntrega() {
        System.out.println("El paquete se ha descargado en el puerto.");
        return "El paquete se ha descargado en el puerto.";
    }
    
    @Override
    public float precio() {
           return (float) 5.0;
    }
    
}
