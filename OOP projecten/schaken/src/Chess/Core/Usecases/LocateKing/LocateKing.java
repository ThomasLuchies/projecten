package Chess.Core.Usecases.LocateKing;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;

public class LocateKing
{
    public static class KingNotFound extends Exception
    {
        public KingNotFound()
        {
            super("King not found.");
        }
    }

    public Coords locate(Board board, Color color) throws KingNotFound, Field.NoPieceAvailable
    {
        Coords coords = null;
        for (var field : board.getFields())
            if (field.pieceOnField())
                if (field.getPiece() instanceof King)
                    if (field.getPiece().getColor() == color)
                        coords = field.getCoords();
        if (coords == null)
            throw new KingNotFound();
        return coords;
    }
}