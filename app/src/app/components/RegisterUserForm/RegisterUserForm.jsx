"use client";

import React, { useState } from "react";
import { registerUser } from "../../services/axios";
import Button from "../Button/Button.jsx";
import Link from "next/link";
import { useRouter } from 'next/navigation';
import { setSessionCookie } from "../../utils/sessionsUtils";

const Form = () => {
  /* CSS styles */
  const registerWrapper = `border-4 rounded-3xl border-bg-color px-8 py-4 mx-auto my-20 max-w-sm`;
  const titleRegister = `text-2xl text-center text-secondary border-b border-secondary pb-2 mb-8`;
  const formWrapper = `flex flex-col gap-1`;
  const labelStyle = `text-text-color text-xl text-left`;
  const buttonsWrapper = `flex flex-row place-content-evenly items-center mb-4`;
  const textStyle = `text-text-color text-xl text-center`;
  const linkStyle = `text-primary text-xl`;
  const inputStyle = `placeholder-text-color px-6 py-2 rounded-full text-xl shadow-[inset_0px_4px_4px_#00000040] transition-colors duration-300 bg-bg-color font-normal focus:outline-none focus:ring focus:ring-text-color w-72 text-text-color`;
  /* END CSS styles */

  const [register, setRegister] = useState({
    name: "",
    email: "",
    password: "",
  });

  const [errorMessage, setErrorMessage] = useState("");
  const router = useRouter();


  const handleChange = (e) => {
    setRegister({ ...register, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const res = await registerUser(register);

      setSessionCookie(res.remember_token);
      router.push("/admin/dashboard");
      router.refresh()

    } catch (error) {
      setErrorMessage("Failed to log in. Please try again later.");
    }
  };
  return (
    <section className={registerWrapper}>
      <h3 className={titleRegister}>Registro de usuario</h3>
      <form className={formWrapper} onSubmit={handleSubmit}>
        <label className={labelStyle}>Nombre</label>
        <input
          type="text"
          name="name"
          value={register.name}
          onChange={handleChange}
          required
          placeholder="Escribe tu nombre ..."
          pattern="[A-Za-z ]+"
          // validationMessage="Nombre requerido"
          className={inputStyle}
        />
        <label className={labelStyle}>E-mail</label>
        <input
          type="email"
          name="email"
          value={register.email}
          placeholder="Escribe tu e-mail ..."
          pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
          required
          onChange={handleChange}
          className={inputStyle}
        />
        <label className={labelStyle}>Contraseña</label>
        <input
          type="password"
          name="password"
          value={register.password}
          placeholder="Escribe tu contraseña ..."
          required
          onChange={handleChange}
          className={inputStyle}
        />
        <div className={buttonsWrapper}>
          <Button type="submit" text="Aceptar" isPrimary={true} />
          <Button text="Cancelar" isPrimary={false} />
        </div>
      </form>
      <p className={textStyle}>
        ¿Ya tienes cuenta? Accede{" "}
        <Link href="/login" className={linkStyle}>
          aquí
        </Link>
      </p>
      {errorMessage && <p className="text-red-500">{errorMessage}</p>}
    </section>
  );
};

export default Form;
