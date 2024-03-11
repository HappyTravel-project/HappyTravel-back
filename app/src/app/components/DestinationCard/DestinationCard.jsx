import Image from "next/image";
import Link from "next/link";

const DestinationCard = ({ data }) => {
  /* CSS styles */
  const gridWrapper = `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[2rem]`;
  const gridItem = `w-[18.75rem] bg-bg-color rounded-[20px_20px_20px_20px]`;
  const imgWrapper = `w-[18.75rem] h-[18.75rem] relative`;
  const infoIconStyle = `w-[3.125rem] h-[3.125rem] z-10 absolute right-2 top-2`;
  const imgStyle = `w-[18.75rem] h-[18.75rem] rounded-[20px_20px_20px_20px]`;
  const titleStyle = `text-2xl font-semibold text-text-color`;
  const textStyle = `text-xl font-normal text-text-color`;
  /* END CSS styles */
  return (
    <ul className={gridWrapper}>
      {Array.isArray(data) && data.map((item, index) => (
        <li key={index} className={gridItem}>
          <div className={imgWrapper}>
            <Link href={`/details/${item.id}`}>
              <Image src="/Assets/Info-icon.svg" alt="Info" className={infoIconStyle} width="50" height="50" />
            </Link>
            <Image
              src={`http://localhost:8000${item.attributes.image}`}
              alt={item.attributes.title}
              layout="fill"
              className={imgStyle}
            />
          </div>
          <div className="p-4">
            <Link href={`/details/${item.id}`}>
              <h5 className={titleStyle}>{item.attributes.title}</h5>
            </Link>
            <p className={textStyle}>{item.attributes.location}</p>
          </div>
        </li>
      ))}
    </ul>
  );
};

export default DestinationCard;
