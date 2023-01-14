package estadocivil.state;

import estadocivil.context.Persona;

public class Soltero extends Estado {
  
  public Soltero(Persona persona) {
    this.persona = persona;
  }
  
  @Override
  public void soltero() {
    persona.setMensaje("Usted ya es soltero");
  }

  @Override
  public void casarse() {
    persona.setEstado(persona.getCasado());
    persona.setMensaje("Usted acaba de casarse");
  }

  @Override
  public void divorciarse() {
    persona.setMensaje("Usted necesita casarse para poder divorciarse");
  }

  @Override
  public void enviudar() {
    persona.setMensaje("Usted necesita estar casado para enviudar");
  }
}
