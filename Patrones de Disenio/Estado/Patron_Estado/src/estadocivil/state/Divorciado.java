package estadocivil.state;

import estadocivil.context.Persona;

public class Divorciado extends Estado {

  public Divorciado(Persona persona) {
    this.persona = persona;
  }

  @Override
  public void soltero() {
    persona.setMensaje("Usted ya no puede ser soltero");
  }

  @Override
  public void casarse() {
    persona.setMensaje("Usted se acaba de volver a casar.. Felicidades!!");
    persona.setEstado(persona.getCasado());
  }

  @Override
  public void divorciarse() {
    persona.setMensaje("Usted ya es divorciado");
  }

  @Override
  public void enviudar() {
    persona.setMensaje("Usted es Divorciado, para enviudar debe estar casado..");
  }
}
