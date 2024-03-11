"use client";

const Input = ({ type, placeholder, validationMessage, value, onChange }) => {
  const inputWrapper = `flex flex-col h-16  mb-4`;

  const inputStyle = `placeholder-text-color px-6 py-2 rounded-full text-xl shadow-[inset_0px_4px_4px_#00000040] transition-colors duration-300 bg-bg-color font-normal focus:outline-none focus:ring focus:ring-text-color w-72 text-text-color`;

  const validationStyle = `text-secondary font-normal text-base mt-1`;

  return (
    <div className={inputWrapper}>
      <input type={type} placeholder={placeholder} className={inputStyle} onChange={onChange} value={value}/>
      {validationMessage && <p className={validationStyle}>{validationMessage}</p>}
    </div>
  );
};

/* chequear que pasa con el text colorrrr */

export default Input;
