package estadocivil.state;

import estadocivil.context.Persona;

public abstract class Estado {
  protected Persona persona;
  
  public abstract void soltero();

  public abstract void casarse();

  public abstract void divorciarse();

  public abstract void enviudar();
}
