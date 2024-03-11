import React from "react";

const PreviousButton = ({ onClick, disabled }) => {
  return (
    <>
    
      <button className="w-[60px] h-[40px] bg-text-color rounded-[20px] flex items-center justify-center">
        <img className="w-[14px] h-[23px] " alt="Previous page" src="./Assets/Vector 3.svg" />
        <img className="w-[14px] h-[23px] " alt="Previous page" src="./Assets/Vector 4.svg" />
      </button>
   
    </>
  );
};

export default PreviousButton;
