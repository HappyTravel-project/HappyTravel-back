"use client";
import DestinationCard from "./DestinationCard";
import { filterData } from "@/app/utils/filterData";

const Destinations = ({ destinations, query }) => {

  const filteredData = destinations ? filterData(destinations, query) : [];

  return (
    <div>
      {filteredData.length > 0 ? <DestinationCard data={filteredData} /> : <div>No hay destinos disponibles.</div>}
    </div>
  );
};

export default Destinations;
