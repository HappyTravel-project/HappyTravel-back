//import Link from "next/link";

const Button = ({ to, text, isPrimary, onSubmit }) => {
  const buttonStyle = `${
    isPrimary ? "bg-primary" : "bg-secondary"
  } text-bg-color px-8 py-1 rounded-full cursor-pointer text-xl hover:bg-opacity-80 transition-colors duration-300 flex`;

  return (
    <button className={buttonStyle} onSubmit={onSubmit}>
      {text}
    </button>
  );
};

export default Button;
