package estadocivil.state;

import estadocivil.context.Persona;

public class Casado extends Estado {

  public Casado(Persona persona) {
    this.persona = persona;
  }
  
  @Override
  public void soltero() {
    persona.setMensaje("Usted ya no puede ser soltero");
  }

  @Override
  public void casarse() {
    persona.setMensaje("Usted ya esta casado");
  }

  @Override
  public void divorciarse() {
    persona.setMensaje("Usted paso de casado a divorciado");
    persona.setEstado(persona.getDivorciado());
  }

  @Override
  public void enviudar() {
    persona.setMensaje("Lamento informarle que acaba de enviudar");
    persona.setEstado(persona.getViudo());
  }
}
