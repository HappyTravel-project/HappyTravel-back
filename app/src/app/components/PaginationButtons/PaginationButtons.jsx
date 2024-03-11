import React from "react";

const PaginationButtons = ({ currentPage, totalPages, updatePage }) => {
  
  const handlePrevPage = () => {
    if (currentPage > 1) {
      updatePage(currentPage - 1);
    }
  };

  const handleNextPage = () => { 
    if (currentPage < totalPages) {
      updatePage(currentPage + 1);
    }
  };

  return (
    <div className="all components w-full p-4">
      <div className="flex items-center justify-center w-full h-[40px] gap-6">
        <a
          className="flex items-center w-[60px] h-[40px] bg-text-color rounded-[20px] justify-center cursor-pointer"
          onClick={handlePrevPage}
          disabled={currentPage === 1}
        >
          <img className="w-[14px] h-[23px] " alt="Previous page" src="./Assets/Vector 3.svg" />
          <img className="w-[14px] h-[23px] " alt="Previous page" src="./Assets/Vector 4.svg" />
        </a>

        <p className="text-text-color text-[25px] ">{currentPage}</p>
        <a
          className="flex items-center w-[60px] h-[40px] bg-text-color rounded-[20px] justify-center cursor-pointer"
          onClick={handleNextPage}
          disabled={currentPage === totalPages}
        >
          <img className="w-[14px] h-[23px] rotate-[-180.00deg]" alt="Next page" src="./Assets/Vector 3.svg" />
          <img className="w-[14px] h-[23px] rotate-[-180.00deg]" alt="Next page" src="./Assets/Vector 4.svg" />
        </a>
      </div>
    </div>
  );
};

export default PaginationButtons;
