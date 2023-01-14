package estadocivil.state;

import estadocivil.context.Persona;

public class Viudo extends Estado {

  public Viudo(Persona persona) {
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
    persona.setMensaje("Para divorciarse debe primero casarse..");
  }

  @Override
  public void enviudar() {
    persona.setMensaje("Usted ya es viudo");
  }

}
