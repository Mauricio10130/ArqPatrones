package estadocivil.context;

import estadocivil.state.Estado;
import estadocivil.state.Viudo;
import estadocivil.state.Casado;
import estadocivil.state.Divorciado;
import estadocivil.state.Soltero;

public class Persona {
  private Estado soltero;
  private Estado casado;
  private Estado viudo;
  private Estado divorciado;
  
  private Estado estado;
  private String mensaje;
  
  public Persona() {
    mensaje =  "";
    soltero = new Soltero(this);
    casado = new Casado(this);
    viudo = new Viudo(this);
    divorciado = new Divorciado(this);
    
    estado = soltero;
  }

  public void solteros(){
    this.estado.soltero();
  }
  
  public void casarse(){
    this.estado.casarse();
  }
  
  public void divorciarse(){
    this.estado.divorciarse();
  }
  
  public void enviudar(){
    this.estado.enviudar();
  }
  
  public void setEstado(Estado estado) {
    this.estado = estado;
  }

  public Estado getSoltero() {
    return soltero;
  }

  public Estado getCasado() {
    return casado;
  }

  public Estado getViudo() {
    return viudo;
  }

  public Estado getDivorciado() {
    return divorciado;
  }

  public void setMensaje(String m) {
    this.mensaje = m;
  }

  public String getMensaje() {
    return this.mensaje;
  }
}
