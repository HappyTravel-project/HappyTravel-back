"use client";

import React from 'react';
import DestinationCard from '../DestinationCard/DestinationCard';
import { EditButton, DeleteButton } from '../DestinationCardButtons/DestinationCardButtons';
import Image from 'next/image';


const LoggedDestinationCard = ({ imageUrl, title, country }) => {
    const topChildren = (
      <div className="absolute top-0 right-0 p-2 z-10">
        <Image
          src="/assets/question-icon.svg"
          alt="Ver detalles"
          width={24}
          height={24}
          className="cursor-pointer"
        />
      </div>
    );
  
    const bottomChildren = (
      <div className="flex justify-end space-x-2">
        <EditButton />
        <DeleteButton />
      </div>
    );
  
    return (
      <DestinationCard
        imageUrl={imageUrl}
        title={title}
        country={country}
        topChildren={topChildren}
        bottomChildren={bottomChildren}
      />
    );
  };
  
  export default LoggedDestinationCard;
