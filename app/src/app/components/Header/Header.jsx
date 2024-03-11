import React from 'react';
import Logo from '../Logo/Logo';
import SearchComponent from '../SearchComponent/SearchComponent';
import NavBar from '../NavBar/NavBar';
import NavBarMobile from '../NavBar/NavBarMobile/NavBarMobile';
import NavBarLoggedMob from '../NavBar/NavBarLoggedMob/NavBarLoggedMob';

const Header = () => {
    return (
        <header className=" border-b-2 border-blue-600 flex flex-col sm:flex-row items-center justify-between mx-4 sm:mx-8 mt-4 pb-4 sm:pb-0 gap-6 sm:gap-8">

            <div className="flex items-center">
                <Logo />
            </div>
            <div className="flex flex-col sm:flex-row items-center gap-6 sm:gap-8">
            
            <SearchComponent/>
                <div className="hidden sm:flex">
                    <NavBar />

                </div>

                <div className="sm:hidden flex items-center gap-6 sm:gap-8">
                    <NavBarMobile/>
                    
                </div>
                <div className="sm:hidden flex items-center gap-6 sm:gap-8">
                    <NavBarLoggedMob />
                </div>

            </div>
        </header>
    );
};

export default Header;

