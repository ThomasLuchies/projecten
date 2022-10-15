package Chess.Core.Usecases.IsChecked;
import Chess.Core.Color;
import Chess.Core.Coords;

public class IsCheckedByBlackPawn extends IsCheckedByPawn
{
    @Override
    protected Coords leftAttackerCoords(Coords kingLocation)
    {
        return new Coords(kingLocation.x() - 1, kingLocation.y() + 1);
    }

    @Override
    protected Coords rightAttackerCoords(Coords kingLocation)
    {
        return new Coords(kingLocation.x() + 1, kingLocation.y() + 1);
    }

    @Override
    protected Color requiredKingColor()
    {
        return Color.white;
    }
}